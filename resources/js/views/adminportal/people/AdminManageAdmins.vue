<template>
  <div>
    <!-- view Employee info modal -->
    <div
      class="modal fade"
      id="adminInfo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addEmployeeLabel"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="h2 modal-title" id="adminInfoLabel">
              <i class="las la-user"></i>
              {{ userinfo.first_name | upText}} {{ userinfo.last_name | upText}}
            </div>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">First Name:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.first_name | upText}}</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Last Name:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.last_name | upText}}</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Birthday:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.dob | bDay}}</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Age:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.dob | yearsSince}} Years</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Gender:</div>
                  <div class="col-md-4 col-form-label" v-if="userinfo.sex">Male</div>
                  <div class="col-md-4 col-form-label" v-else>Female</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Username:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.username }}</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Joined ADECOTS on:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.joined_on | momentTime}}</div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-form-label font-weight-bold text-md-right">Position:</div>
                  <div class="col-md-4 col-form-label">{{ userinfo.position | upText }}</div>
                </div>
              </div>
              <div class="col-md-5">
                <img v-if="userinfo.sex" src="images/defaultMprof_pic.jpg" alt="">
                <img v-else src="images/defaultFprof_pic.png" alt="">
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-3 col-form-label font-weight-bold text-md-right">Biography:</div>
              <div class="col-md-7 col-form-label">{{ userinfo.bio | upText }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Admin Modal -->
    <div
      class="modal fade"
      id="addAdmin"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addAdminLabel"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h2 class="modal-title" id="addAdminLabel">
              <i class="las la-user-plus"></i>
              Add Admin
            </h2>
          </div>
          <div class="modal-body">
            <form @submit.prevent="createUser">
              <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                <div class="col-md-6">
                  <input
                    v-model="form.first_name"
                    id="first_name"
                    type="text"
                    class="form-control"
                    name="first_name"
                    required
                    autocomplete="first_name"
                    autofocus
                    :class="{ 'is-invalid': form.errors.has('first_name') }"
                  />
                  <has-error :form="form" field="first_name"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                <div class="col-md-6">
                  <input
                    v-model="form.last_name"
                    id="last_name"
                    type="text"
                    class="form-control"
                    name="last_name"
                    required
                    autocomplete="last_name"
                    :class="{ 'is-invalid': form.errors.has('last_name') }"
                  />
                  <has-error :form="form" field="last_name"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                <div class="col-md-6">
                  <div class="form-check form-check-inline">
                    <input
                      v-model="form.sex"
                      class="form-check-input"
                      type="radio"
                      name="sex"
                      id="sex1"
                      value="1"
                    />
                    <label class="form-check-label" for="sex1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      v-model="form.sex"
                      class="form-check-input"
                      type="radio"
                      name="sex"
                      id="sex2"
                      value="0"
                    />
                    <label class="form-check-label" for="sex2">Female</label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                <div class="col-md-6">
                  <input
                    v-model="form.position"
                    id="position"
                    type="text"
                    class="form-control"
                    name="position"
                    required
                    autocomplete="position"
                    :class="{ 'is-invalid': form.errors.has('position') }"
                  />
                  <has-error :form="form" field="position"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label for="joined_on" class="col-md-4 col-form-label text-md-right">Date Joined</label>
                <div class="col-md-6">
                  <input
                    v-model="form.joined_on"
                    id="joined_on"
                    type="date"
                    class="form-control"
                    name="joined_on"
                    required
                    autocomplete="joined_on"
                    :class="{ 'is-invalid': form.errors.has('joined_on') }"
                  />
                  <has-error :form="form" field="joined_on"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                  <input
                    v-model="form.username"
                    id="username"
                    type="text"
                    class="form-control"
                    name="username"
                    required
                    autocomplete="username"
                    :class="{ 'is-invalid': form.errors.has('username') }"
                  />
                  <has-error :form="form" field="username"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input
                    v-model="form.password"
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  />
                  <has-error :form="form" field="password"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-right"
                >Confirm Password</label>

                <div class="col-md-6">
                  <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                  />
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- List all Admins Card -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <div class="card">
            <div class="card-header px-5 d-flex justify-content-center">
              <span class="h4  ">Admins</span>
            </div>

            <div class="card-body d-flex justify-content-center">

          <div class="row">
            <div
              class="col-lg-2 col-md-3 col-sm-5 col-6 mb-2"
              v-for="user in users"
              :key="user.id"
            >
              <a href="#" @click.prevent="userInfoModal(user.id)">
                <div class="card text-center bordenr-0 mb-4">
                  <div class="row d-flex justify-content-center">
                    <div class="col px-5 py-2">
                      <div v-if="user.profile_pic != 'default'">
                        <img
                          class="img-fluid border border-dark rounded-circle"
                          v-bind:src="'images/profile/' + user.profile_pic"
                          alt
                        />
                      </div>
                      <div v-else-if="user.profile_pic == 'default'">
                        <img
                          class="img-fluid border border-dark rounded-circle"
                          v-if="user.sex"
                          src="images/defaultMprof_pic.jpg"
                          alt
                        />
                        <img
                          class="img-fluid border border-dark rounded-circle"
                          v-else
                          src="images/defaultFprof_pic.png"
                          alt
                        />
                      </div>
                    </div>
                  </div>
                  <div class="card-footer p-1">
                    {{ user.first_name | upText }}
                    {{ user.last_name | upText }} <br />{{
                      user.position | upText
                    }}
                  </div>
                  <div class="card-footer p-1 d-flex justify-content-lg-around">
                    <a href="#" @click.prevent="editUser(user.id)">
                      <i class="las la-cog pr-2" style="color: black;"></i>
                    </a>
                    <a href="#" @click.prevent="deleteUser(user.id)">
                      <i class="las la-trash pr-2" style="color: #f44;"></i>
                    </a>
                  </div>
                </div>
              </a>
            </div>
          </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <a href="#" @click.prevent="newUserModal" class="  px-3">
                <i class="las la-user-plus mr-1"></i>
                Add Admin
              </a>
              <router-link :to="{ name: 'adminhomeallemployees' }" class="  px-3">
                <i class="las la-user mr-1"></i>
                Employees
              </router-link>
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
      users: {},
      form: new Form({
        sex: "1"
      }),
      userinfo: {},

    };
  },

  methods: {
    loadUsers() {
      axios
        .get("api/admin-get-alladmins")
        .then(response => (this.users = response.data)); //get all data from DB
    },

    newUserModal() {
      this.form.reset();
      $("#addAdmin").modal("show");
    },

    userInfoModal(id) {
      axios.get("api/admin-get-admin/" + id).then(response => {
        this.userinfo = response.data;
        console.log(response.data);
      });
      $("#adminInfo").modal("show");
    },

    deleteUser(id) {
      Swal.fire({
        title: "Delete admin?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/admin-delete-admin/" + id)
            .then(() => {
              toast.fire({ icon: "success", title: "Admin deleted" });
              CustomEvent.$emit("adminAdded");
            })
            .catch(() => {
              this.$Progress.fail();
              toast.fire({ icon: "warning", title: "Error deleting admin" });
            });
        }
      });
    },

    createUser() {
      this.$Progress.start(); // start progress bar
      this.form
        .post("api/admin-add-admin") //post user to DB
        .then(() => {
          $("#addAdmin").modal("hide");
          CustomEvent.$emit("adminAdded");
          this.$Progress.finish(); // stop progress bar
          toast.fire({ icon: "success", title: "Admin successfully added" });
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
        })
        .catch(() => {
          this.$Progress.fail();
          toast.fire({ icon: "warning", title: "Error creating admin" });
        });
    },

    editUser(user) {
      store.data.user = user;
      this.$router.push({ name: 'adminhomeeditad'});
    }
  },
  created() {
    this.loadUsers(); //load users at first load
    CustomEvent.$on("adminAdded", () => {
      this.loadUsers();
    });
  }
};
</script>
