<template>
  <div>
    <div>
      <div>
        <b-navbar type="light" variant="light">
          <b-navbar-nav>
            <b-nav-item v-b-toggle.sidebar-backdrop>
              <b-button class="border-0 p-0" squared variant="outline-dark">
                <i class="las la-bars px-1"></i>
              </b-button>
            </b-nav-item>
          </b-navbar-nav>
        </b-navbar>
      </div>

      <div>
        <b-sidebar
          id="sidebar-backdrop"
          title="People"
          width="250px"
          backdrop-variant="dark"
          bg-variant="dark"
          text-variant="light"
          backdrop
          shadow
        >
          <div class="px-3 py-2">
            <b-nav vertical class="w-25">
              <b-nav-item active>Active</b-nav-item>
              <b-nav-item>Link</b-nav-item>
              <b-nav-item>Another Link</b-nav-item>
              <b-nav-item>Another Link</b-nav-item>
              <b-nav-item>Another Link</b-nav-item>
              <b-dropdown-divider></b-dropdown-divider>
              <b-nav-item  v-on:click.prevent="goTo('adminhomedash')" >Dashboard</b-nav-item>
              <b-nav-item-dropdown
                id="my-nav-dropdown"
                text="Dropdown"
                toggle-class="nav-link-custom"
                right
              >
                <b-dropdown-item>One</b-dropdown-item>
                <b-dropdown-item>Two</b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item>Three</b-dropdown-item>
              </b-nav-item-dropdown>
            </b-nav>
          </div>
        </b-sidebar>
      </div>
    </div>

    <!-- view Employee info modal -->
    <div
      class="modal fade"
      id="emplyeeInfo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addEmployeeLabel"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="h2 modal-title" id="emplyeeInfoLabel">
              <i class="las la-user"></i>
              {{ userinfo.first_name | upText }}
              {{ userinfo.last_name | upText }}
            </div>
          </div>

          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-md-8 d-flex justify-content-center align-content-end">
                <b-avatar
                  size="10rem"
                  v-bind:src="'images/profile/'+userinfo.profile_pic"
                  class="mr-3"
                ></b-avatar>
              </div>

              <div class="col-md-8 mt-4">
                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">First Name:</div>
                  <div class="col-4 col-form-label">{{ userinfo.first_name | upText }}</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Last Name:</div>
                  <div class="col-4 col-form-label">{{ userinfo.last_name | upText }}</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Birthday:</div>
                  <div class="col-4 col-form-label">{{ userinfo.dob | bDay }}</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Age:</div>
                  <div class="col-4 col-form-label">{{ userinfo.dob | yearsSince }} Years</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Gender:</div>
                  <div class="col-4 col-form-label" v-if="userinfo.sex">Male</div>
                  <div class="col-4 col-form-label" v-else>Female</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Joined ADECOTS on:</div>
                  <div class="col-4 col-form-label">{{ userinfo.joined_on | momentTime }}</div>
                </div>

                <div class="row">
                  <div class="col-6 col-form-label font-weight-bold text-right">Position:</div>
                  <div class="col-4 col-form-label">{{ userinfo.position | upText }}</div>
                </div>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-3 col-form-label font-weight-bold text-right">Biography:</div>
              <div class="col-7 col-form-label">{{ userinfo.bio | upText }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- add employeee Modal -->
    <div
      class="modal fade"
      id="addEmployee"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addEmployeeLabel"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-lg-center">
            <h2 class="modal-title" id="addEmployeeLabel">
              <i class="las la-user-plus"></i>
              Add Employee
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
                      checked="checked"
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

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      v-model="form.is_admin"
                      type="checkbox"
                      name="remember"
                      id="remember"
                    />
                    <label class="form-check-label" for="remember">
                      Make Admin
                      <br />
                      <span class="text-danger">
                        <small>(they will have all the privileges)</small>
                      </span>
                    </label>
                  </div>
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

    <!-- list employees card -->
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="py-3 d-flex">
          <span class="h4 justify-content-center">People</span>
        </div>
      </div>

      <div class="row my-4 d-flex justify-content-center" v-for="user in users" :key="user.id">
        <div
          v-on:click.prevent="userInfoModal(user.id)"
          class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-5 border py-2 d-flex justify-content-center"
          style="background-color: #aaa;"
        >
          <div
            v-on:click.prevent.stop="userAvatarModal(user.id)"
            class="col-3 d-flex align-items-center justify-content-center"
          >
            <b-avatar size="5rem" v-bind:src="'images/profile/' + user.profile_pic" class="mr-3"></b-avatar>
          </div>
          <div class="col-9">
            <div>
              <span class="mr-auto pt-1 d-flex align-self-center">
                <strong>
                  <i class="las la-user px-1"></i>
                  {{ user.first_name | upText }} {{ user.last_name | upText }}
                </strong>
                <span class="px-2">|</span>
                <span>
                  <i class="las la-sitemap px-1"></i>
                  {{ trimStr(user.position, 15) | upText }}
                </span>
              </span>
            </div>
            <hr />

            <div class="mr-auto d-flex align-self-center">
              <div class="align-self-center h1">
                <i class="las la-quote-left px-1"></i>
              </div>
              <div>{{ trimStr(user.bio, 90) | upText }}</div>
              <div class="align-self-center h1">
                <i class="las la-quote-right px-1"></i>
              </div>
            </div>
            <hr />
            <div class="px-1 d-flex justify-content-start">
              <b-button
                class="mr-5 border-0"
                pill
                variant="outline-secondary"
                size="sm"
                v-on:click.prevent.stop="editUser(user.id)"
              >
                <span class="h6">
                  <i class="las la-edit px-2" style=" color:black;"></i>
                </span>
              </b-button>

              <b-button
                class="border-0"
                pill
                variant="outline-danger"
                size="sm"
                v-on:click.prevent.stop="deleteUser(user.id)"
              >
                <span class="h6">
                  <i class="las la-trash px-2"></i>
                </span>
              </b-button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- edit Avatar modal -->
    <div
      class="modal fade"
      id="editAvatar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="editAvatarLabel"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="h2 modal-title" id="editAvatarLabel">
              <i class="las la-user"></i>
              {{ userinfo.first_name | upText }}
              {{ userinfo.last_name | upText }}
            </div>
          </div>

          <div class="modal-body">
            <div class="row d-flex justify-content-center">
              <div class="col-11 col-md-8 col-sm-10 col-lg-6">
                <div class="row d-flex justify-content-center border-bottom pb-5">
                  <div class="col-12 d-flex justify-content-center">Current Avatar</div>
                  <hr />
                  <div class="col-12 d-flex justify-content-center">
                    <b-avatar
                      size="10rem"
                      v-bind:src="'images/profile/' + userinfo.profile_pic"
                      class="mr-3"
                    ></b-avatar>
                  </div>
                  <div v-if="!edit" class="col-12 d-flex justify-content-around pt-1">
                    <div class="px-1 d-flex justify-content-start">
                      <b-button
                        class="mr-5 border-0"
                        pill
                        variant="outline-secondary"
                        size="sm"
                        v-on:click.prevent.stop="editAvatarActive"
                      >
                        <span class="h6">
                          <i class="las la-edit px-2" style=" color:black;"></i>
                        </span>
                      </b-button>

                      <b-button
                        class="border-0"
                        pill
                        variant="outline-danger"
                        size="sm"
                        v-on:click.prevent.stop="deletegUser(user.id)"
                      >
                        <span class="h6">
                          <i class="las la-trash px-2"></i>
                        </span>
                      </b-button>
                    </div>
                  </div>
                </div>

                <div v-if="edit" class="row py-5">
                  <div class="col-12 d-flex justify-content-center">Update Avatar</div>
                  <hr />
                  <div class="col-12">
                    <b-form-group id="input-group-5">
                      <b-form-file
                        size="sm"
                        no-drop

                        placeholder="Choose a image"
                        v-on:change="proPic"
                      ></b-form-file>
                    </b-form-group>
                  </div>
                  <div class="col-12 d-flex justify-content-around pt-4">
                    <b-button
                      v-if="send"
                      class="px-4"
                      v-on:click="sendAvatar(userinfo.id)"
                      pill
                      variant="outline-primary"
                    >Update</b-button>
                    <b-button
                      class="px-4"
                      v-on:click="cancelAvatar"
                      pill
                      variant="outline-danger"
                    >Cancel</b-button>
                  </div>
                </div>
              </div>
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
      send: false,
      edit: false,
      users: {},

      form: new Form({
        sex: "1"
      }),

      avatarForm: new Form({
        key: null,
        avatar: null
      }),

      userinfo: {}
    };
  },

  methods: {
    sendAvatar(id) {
      this.$Progress.start(); // start progress bar

      this.avatarForm.key = id;

      this.avatarForm
        .post("api/admin-update-avatar") //post user to DB
        .then(() => {
          $("#editAvatar").modal("hide");
          CustomEvent.$emit("employeeAdded");
          this.$Progress.finish(); // stop progress bar
          toast.fire({
            icon: "success",
            title: "Employee successfully updated"
          });
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          this.avatarForm.reset();
        })
        .catch(() => {
          this.$Progress.fail();
          toast.fire({ icon: "warning", title: "Error updating avatar" });
        });
      this.send = false;
    },

    cancelAvatar() {
      $("#editAvatar").modal("hide");
      $("body").removeClass("modal-open");
      $(".modal-backdrop").remove();
      this.send = false;
    },

    proPic(e) {
      var file = e.target.files[0];
      var reader = new FileReader();

      if (file["size"] < 3100000) {
        reader.onloadend = file => {
          this.avatarForm.avatar = reader.result;
        };
        reader.readAsDataURL(file);
        this.send = true;
      } else {
        toast.fire({ icon: "warning", title: "image size too large" });
        $("#editAvatar").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        this.avatarForm.reset();
      }
    },

    editAvatarActive() {
      this.edit = true;
    },

    loadUsers() {
      axios
        .get("api/admin-get-allemployees")
        .then(response => (this.users = response.data)); //get all data from DB
    },

    trimStr(str, num) {
      if (str.length >= num) {
        var a = str.substring(0, num) + "...";
        return a.replace("\n", " ");
      }
      return str.replace("\n", " ");
    },

    newModal() {
      this.form.reset();
      $("#addEmployee").modal("show");
    },

    updateProfilePhoto(element) {
      let file = element.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.string64 = reader.result;
      };
      reader.readAsDataURL(file);
    },


    goTo(a) {
      this.$router.push({name:a});
    },

    userInfoModal(id) {
      axios.get("api/admin-get-employee/" + id).then(response => {
        this.userinfo = response.data;
      });
      $("#emplyeeInfo").modal("show");
    },

    userAvatarModal(id) {
      this.send = false;
      this.edit = false;
      axios.get("api/admin-get-employee/" + id).then(response => {
        this.userinfo = response.data;
      });
      $("#editAvatar").modal("show");
    },

    deleteUser(id) {
      Swal.fire({
        title: "Delete employee?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/admin-delete-user/" + id)
            .then(() => {
              toast.fire({ icon: "success", title: "Employee deleted" });
              CustomEvent.$emit("employeeAdded");
            })
            .catch(() => {
              toast.fire({ icon: "warning", title: "Error deleting employee" });
            });
        }
      });
    },

    createUser() {
      this.$Progress.start(); // start progress bar
      this.form
        .post("api/admin-add-employee") //post user to DB
        .then(() => {
          $("#editEmployee").modal("hide");
          CustomEvent.$emit("employeeAdded");
          this.$Progress.finish(); // stop progress bar
          toast.fire({
            icon: "success",
            title: "Employee successfully updated"
          });
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
        })
        .catch(() => {
          this.$Progress.fail();
          toast.fire({ icon: "warning", title: "Error updating employee" });
        });
    },

    editUser(user) {
      store.data.user = user;
      this.$router.push({ name: "adminhomeeditep" });
    }
  },

  created() {
    this.loadUsers(); //load users at first load
    CustomEvent.$on("employeeAdded", () => {
      this.loadUsers();
    });
  }
};
</script>
