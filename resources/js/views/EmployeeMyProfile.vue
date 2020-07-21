

<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div
            class="card"
            style="background: rgba(0,0,0,0.5);
            border-style:solid;
            border-width: 1px;
            border-color :#040;"
          >
            <div class="card-header">
              <div class="card p-0" style="background: rgba(0,0,0,0.5);">
                <div class="row no-gutters bg-none">
                  <div class="col-lg-4">
                    <img class="card-img rounded-circle" src="images/defaultMprof_pic.jpg" alt />
                  </div>
                  <div class="col-lg-7">
                    <div class="card-body">
                      <h2 class="card-title pt-5   text-center">Your Details</h2>
                      <h6 class="pt-5">
                        <p
                          class="card-text text-center  "
                        >Feel free to edit some of your details below:</p>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <p />
                  <h5 class=" ">
                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">First Name:</div>
                      <div class="col-lg-8">{{ form.first_name | upText}}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Last Name:</div>
                      <div class="col-lg-8">{{ form.last_name | upText}}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">username:</div>
                      <div class="col-lg-8">{{ form.username}}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Position:</div>
                      <div class="col-lg-8">{{ form.position | upText }}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Email:</div>
                      <div v-if="form.email0" class="col-lg-8">{{ form.email0 }}</div>
                      <div v-else-if="!form.email0" class="col-lg-8">Not Provided</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div v-if="form.email1">
                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-5">Email 2:</div>
                        <div class="col-lg-8">{{ form.email1 }}</div>
                      </div>
                      <hr
                        style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                      />
                      <br />
                    </div>

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Mobile phone:</div>
                      <div v-if="form.phone0" class="col-lg-8">{{ form.phone0 }}</div>
                      <div v-else-if="!form.phone0" class="col-lg-8">Not Provided</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div v-if="form.phone1">
                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-5">Mobile phone 2:</div>
                        <div class="col-lg-8">{{ form.phone1 }}</div>
                      </div>
                      <hr
                        style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                      />
                      <br />
                    </div>

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Date of Birth:</div>
                      <div class="col-lg-8">{{ form.dob | momentTime}}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Biography:</div>
                      <div class="col-lg-8">{{ form.bio }}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Sex:</div>
                      <div class="col-lg-8" v-if="form.sex">Male</div>
                      <div class="col-lg-8" v-if="!form.sex">Female</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                    <br />

                    <div class="row">
                      <div class="col-lg-4 font-weight-bold pl-5">Joined ADECOTS:</div>
                      <div class="col-lg-8">{{ form.joined_on | momentTime}}</div>
                    </div>
                    <hr
                      style="height:0.25px; border-top: 0px; width:90%; color:#440; background-color: #440;"
                    />
                  </h5>
                  <div></div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button
                type="button"
                class=" "
                style="background: rgba(0,0,0,0.3);
                border-style:solid;
                border-width: 1px;
                border-color : #040;
                border-radius : 5px;"
                @click="editProfileModal"
              >
                <i class="las la-edit mr-3"></i>Edit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div
        class="modal fade"
        id="editMyProfileModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="updateInfo">
                <div class="form-group">
                  <label>First Name:</label>
                  <input
                    v-model="form.first_name"
                    type="text"
                    name="first_name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('first_name') }"
                  />
                  <has-error :form="form" field="first_name"></has-error>
                </div>

                <div class="form-group">
                  <label>Last Name:</label>
                  <input
                    v-model="form.last_name"
                    type="text"
                    name="last_name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('last_name') }"
                  />
                  <has-error :form="form" field="last_name"></has-error>
                </div>
                <hr />
                <div class="form-group">
                  <p>Sex</p>
                  <label class="vf-text pr-3">
                    <input v-model="form.sex" type="radio" name="sex" value="1" />
                    <span class="pl-2">Male</span>
                  </label>
                  <label class="vf-text pl-3">
                    <input v-model="form.sex" type="radio" name="sex" value="0" />
                    <span class="pl-2">Female</span>
                  </label>
                </div>
                <hr />

                <div class="form-group">
                  <label>Date of birth:</label>
                  <input
                    v-model="form.dob"
                    type="date"
                    name="dob"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('dob') }"
                  />
                  <has-error :form="form" field="dob"></has-error>
                </div>

                <div class="form-group">
                  <label>username:</label>
                  <input
                    v-model="form.username"
                    type="text"
                    name="username"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('username') }"
                  />
                  <has-error :form="form" field="username"></has-error>
                </div>

                <div class="form-group">
                  <label>A brief biography:</label>
                  <textarea
                    v-model="form.bio"
                    type="text"
                    name="bio"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('bio') }"
                  />
                  <has-error :form="form" field="bio"></has-error>
                </div>

                <div class="form-group">
                  <label>Phone Number:</label>
                  <input
                    v-model="form.phone0"
                    type="text"
                    name="phone0"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('phone0') }"
                  />
                  <has-error :form="form" field="phone0"></has-error>
                </div>

                <div class="form-group">
                  <label>
                    Phone Number 2:
                    <small>(optional)</small>
                  </label>
                  <input
                    v-model="form.phone1"
                    type="text"
                    name="phone1"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('phone1') }"
                  />
                  <has-error :form="form" field="phone1"></has-error>
                </div>

                <div class="form-group">
                  <label>Email Address:</label>
                  <input
                    v-model="form.email0"
                    type="text"
                    name="email0"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email0') }"
                  />
                  <has-error :form="form" field="email0"></has-error>
                </div>

                <div class="form-group">
                  <label>
                    Email Address 2:
                    <small>(optional)</small>
                  </label>
                  <input
                    v-model="form.email1"
                    type="text"
                    name="email1"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email1') }"
                  />
                  <has-error :form="form" field="email1"></has-error>
                </div>
                <hr />

                <div class="form-group">
                  <label class="pr-3">Profile Pic:</label>
                  <input type="file" name="profile_pic" @change="updateProfilePhoto" />
                </div>
                <hr />

                <div class="form-group">
                  <label>Password:</label>
                  <input
                    v-model="form.password"
                    type="password"
                    name="password"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  />
                  <has-error :form="form" field="password"></has-error>
                </div>

                <!-- <div class="form-group">
                  <label>Comfirm Password:</label>
                  <input
                    v-model="form.password"
                    type="password"
                    name="password"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  />
                  <has-error :form="form" field="password"></has-error>
                </div>-->

                <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Update</button>
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
  name: "EmployeeMyProfile",
  data() {
    return {
      id: 6,
      form: new Form({
        first_name: "",
        last_name: "",
        username: "",
        position: "",
        password: "",
        sex: true,
        email0: "",
        email1: "",
        phone0: "",
        phone1: "",
        dob: "",
        bio: "",
        joined: "",
        strin: "",
        profile_pic: "",
        i: 12,
        remember: false
      })
    };
  },

  methods: {
    editProfileModal() {
      //   this.form.reset();
      $("#editMyProfileModal").modal("show");
    },
    updateInfo() {
      this.form
        .put("api/empl/")
        .then(() => {})
        .catch(() => {});
    },

    updateProfilePhoto(element) {
      let file = element.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.string64 = reader.result;
      };
      reader.readAsDataURL(file);
      //   console.log(file);
    }
  },

  mounted() {
    console.log("Component mounted.");
  },

  created() {
    axios
      .get("api/employee/" + this.id)
      .then(({ data }) => this.form.fill(data));
  }
};
</script>
