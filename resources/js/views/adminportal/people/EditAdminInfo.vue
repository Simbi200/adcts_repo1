<template>
  <div>
    <!-- Edit Admin Card -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header px-5 d-flex justify-content-center">
              <span class="h4  ">Edit Profile</span>
            </div>

            <div class="card-body justify-content-center">
              <form @submit.prevent="editUser(editform.id)" class=" ">
                <div class="form-group row">
                  <label
                    for="edit_first_name"
                    class="col-md-4 col-form-label text-md-right"
                  >First Name</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.first_name"
                      id="edit_first_name"
                      type="text"
                      class="form-control"
                      name="first_name"
                      required
                      autocomplete="first_name"
                      autofocus
                      :class="{ 'is-invalid': editform.errors.has('first_name') }"
                    />
                    <has-error :form="editform" field="first_name"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.last_name"
                      id="edit_last_name"
                      type="text"
                      class="form-control"
                      name="last_name"
                      required
                      autocomplete="last_name"
                      :class="{ 'is-invalid': editform.errors.has('last_name') }"
                    />
                    <has-error :form="editform" field="last_name"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edit_dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.dob"
                      id="edit_dob"
                      type="date"
                      class="form-control"
                      name="dob"
                      required
                      autocomplete="dob"
                      :class="{ 'is-invalid': editform.errors.has('dob') }"
                    />
                    <has-error :form="editform" field="dob"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                  <div class="col-md-7">
                    <div class="form-check form-check-inline">
                      <input
                        v-model="editform.sex"
                        class="form-check-input"
                        type="radio"
                        name="sex"
                        id="edit_sex1"
                        value="1"
                      />
                      <label class="form-check-label" for="edit_sex1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        v-model="editform.sex"
                        class="form-check-input"
                        type="radio"
                        name="sex"
                        id="edit_sex2"
                        value="0"
                      />
                      <label class="form-check-label" for="edit_sex2">Female</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edit_position" class="col-md-4 col-form-label text-md-right">Position</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.position"
                      id="edit_position"
                      type="text"
                      class="form-control"
                      name="position"
                      required
                      autocomplete="position"
                      :class="{ 'is-invalid': editform.errors.has('position') }"
                    />
                    <has-error :form="editform" field="position"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="edit_joined_on"
                    class="col-md-4 col-form-label text-md-right"
                  >Date Joined</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.joined_on"
                      id="edit_joined_on"
                      type="date"
                      class="form-control"
                      name="joined_on"
                      required
                      autocomplete="joined_on"
                      :class="{ 'is-invalid': editform.errors.has('joined_on') }"
                    />
                    <has-error :form="editform" field="joined_on"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edit_username" class="col-md-4 col-form-label text-md-right">Username</label>
                  <div class="col-md-7">
                    <input
                      v-model="editform.username"
                      id="edit_username"
                      type="text"
                      class="form-control"
                      name="username"
                      required
                      autocomplete="username"
                      :class="{ 'is-invalid': editform.errors.has('username') }"
                    />
                    <has-error :form="editform" field="username"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edit_bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                  <div class="col-md-7">
                    <textarea
                      v-model="editform.bio"
                      id="edit_bio"
                      type="text"
                      class="form-control"
                      name="bio"
                      rows="5"
                      required
                      autocomplete="bio"
                      :class="{ 'is-invalid': editform.errors.has('bio') }"
                    />
                    <has-error :form="editform" field="bio"></has-error>
                  </div>
                </div>
            <div class="card-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-danger mx-2" @click="goBack">Cancel</button>
                  <button type="submit" class="btn btn-success mx-2">Update</button>
            </div>
              </form>
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
    return {
      theuser: store.data.user,
      editform: new Form({
        sex: "",
        last_name: "",
        first_name: "",
        position: "",
        joined_on: "",
        username: "",
        bio: "",
        dob: "",
        id: 0
      })
    };
  },

  methods: {
    editUser(id) {
      this.$Progress.start(); // start progress bar
      this.editform
        .put("api/admin-update-admin/" + id) //post user to DB
        .then(() => {
          // $("#editAdmin").modal("hide");
          CustomEvent.$emit("adminEdited");
          this.$Progress.finish(); // stop progress bar
          toast.fire({
            icon: "success",
            title: "Admin successfully updated"
          });

          // $("body").removeClass("modal-open");
          // $(".modal-backdrop").remove();
        })
        .catch(() => {
          this.$Progress.fail();
          toast.fire({ icon: "warning", title: "Error updating admin" });
        });
        this.goBack();
    },

    goBack(){
      this.$router.go(-1);
    },

    loadUser(id) {
      axios
        .get("api/admin-get-admin/" + id)
        .then(response => this.editform.fill(response.data));
      // $("#editAdmin").modal("show");
    }
  },
  created() {
    this.loadUser(this.theuser);
    if(this.theuser==null){
      this.goBack();
    }
  },

};
</script>
