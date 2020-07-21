<template>
  <div>
    <!-- Edit Employee Card -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mt-5">
            <div class="card-header px-5 d-flex justify-content-center">
              <span class="h4">Edit {{ editform.first_name }} {{ editform.last_name }}'s Profile</span>
            </div>

            <div class="card-body justify-content-center">
              <b-form v-on:submit.prevent="editUser(editform.id)">

                <b-form-group id="input-group-1" label="First Name:" label-cols-sm="3" label-size="sm" label-for="first_name">
                  <b-form-input id="first_name" :state="Boolean(editform.first_name)" size="sm" v-model="editform.first_name" required></b-form-input>
                </b-form-group>


                <b-form-group id="input-group-2" label="Last Name:" label-cols-sm="3" label-size="sm" label-for="last_name">
                  <b-form-input id="last_name" :state="Boolean(editform.last_name)" size="sm" v-model="editform.last_name" required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-3" label="Date of Birth:" label-cols-sm="3" label-size="sm" label-for="dob">
                  <b-form-datepicker id="dob" :state="Boolean(editform.dob)" size="sm" v-model="editform.dob" required></b-form-datepicker>
                </b-form-group>

                <b-form-group id="input-group-4" label="Sex:" label-cols-sm="3" label-size="sm" label-for="sex">
                  <b-form-radio-group id="sex" size="sm" buttons button-variant="outline-primary" v-model="editform.sex" :options="sex_options"></b-form-radio-group>
                </b-form-group>                
          
                <br>
                 <hr>
                <br>               


                <b-form-group id="input-group-6" label="Position:" label-cols-sm="3" label-size="sm" label-for="position">
                  <b-form-input id="position" :state="Boolean(editform.position)" size="sm" v-model="editform.position" required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-7" label="Role:" label-cols-sm="3" label-size="sm" label-for="role">
                  <b-form-radio-group id="role" size="sm" buttons button-variant="outline-primary" v-model="editform.role" :options="role_options"></b-form-radio-group>
                </b-form-group>

                <b-form-group id="input-group-8" label="Date Joined ADECOTS:" label-cols-sm="3" label-size="sm" label-for="joined_on">
                  <b-form-datepicker id="joined_on" :state="Boolean(editform.joined_on)" size="sm" v-model="editform.joined_on" required></b-form-datepicker>
                </b-form-group>

                <b-form-group id="input-group-9" label="Username:" label-cols-sm="3" label-size="sm" label-for="username">
                  <b-form-input id="username" :state="Boolean(editform.username)" size="sm" v-model="editform.username" required></b-form-input>
                </b-form-group>
                <br>
                 <hr>
                <br>

                <b-form-group id="input-group-10" label="Biography:" label-cols-sm="3" label-size="sm" label-for="bio">
                  <b-form-textarea id="bio" :state="Boolean(editform.bio)" rows="5" size="sm" v-model="editform.bio" required></b-form-textarea>
                </b-form-group>
                <hr>

                <div class="d-flex justify-content-center">
                  <b-button type="button" pill variant="outline-danger" size="sm" class="mx-3 px-4" v-on:click.prevent="goBack">Cancel</b-button>
                  <b-button type="submit" pill variant="outline-success" size="sm" class="mx-3 px-4">Update</b-button>
                </div>
              </b-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {


  data() {
    const now = new Date()
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
    const minDob = new Date(today)
    // let formData = new FormData()


    return {
      theuser: store.data.user,
      sex_options: [{text: 'Male', value:1 }, {text: 'Female', value:0}],
      role_options: [{text: 'Admin', value: 'admin'}, {text: 'Staff', value: 'staff'}],

      // formData: new FormData({}),

      editform: new Form({
        sex: "",
        last_name: "",
        first_name: "",
        position: "",
        joined_on: "",
        username: "",
        bio: "",
        role: "",
        dob: "",
        photo: null,
        id: 0
      })
    };
  },

  methods: {
    editUser(id) {
      this.$Progress.start(); // start progress bar
      let formData = new FormData();

      if(this.editform.photo){formData.append('photo', this.editform.photo);}
      formData.append('sex', this.editform.sex);
      formData.append('last_name', this.editform.last_name);
      formData.append('first_name', this.editform.first_name);
      formData.append('position', this.editform.position);
      formData.append('joined_on', this.editform.joined_on);
      formData.append('username', this.editform.username);
      formData.append('bio', this.editform.bio);
      formData.append('role', this.editform.role);
      formData.append('dob', this.editform.dob);
      formData.append('key', this.editform.id);
      console.log(formData);


      axios
        .post("api/admin-update-user/", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }) //post user to DB
        .then(() => {
          CustomEvent.$emit("employeeEdited");
          this.$Progress.finish(); // stop progress bar
          toast.fire({
            icon: "success",
            title: "Employee successfully updated"
          });
        })
        .catch(response => {
          this.$Progress.fail();
          toast.fire({ icon: "warning", title: "Error updating employee" });
        });
      this.goBack();
    },

    proPic(e) {
      console.log(e);
       let file = e.target.files[0];

      //  if (file["size"] < 3145728) {
        this.editform.photo = file;
      //  }
    },

    goBack() {
      this.$router.go(-1);
    },

    loadUser(id) {
      axios
        .get("api/admin-get-employee/" + id)
        .then(response => this.editform.fill(response.data));
    }
  },
  created() {
    if (this.theuser == null) {
      this.goBack();
    } else {
      this.loadUser(this.theuser);
    }
  }
};
</script>
