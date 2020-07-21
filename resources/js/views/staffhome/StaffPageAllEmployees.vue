<template>
  <div class="container-fluid pt-4 rounded-circle">
    <div>
      <div>
        <b-navbar type="dark" variant="dark">
          <b-navbar-nav>
            <b-nav-item v-b-toggle.sidebar-backdrop>
              <b-button class="border-0 p-0" squared variant="outline-light">
                <i class="las la-bars px-1"></i>
              </b-button>
            </b-nav-item>
          </b-navbar-nav>
        </b-navbar>
      </div>

      <div>
        <b-sidebar
          id="sidebar-backdrop"
          aria-labelledby="sidebar-no-header-title"
          no-header
          backdrop-variant="dark"
          bg-variant="dark"
          text-variant="light"
          backdrop
          shadow
        >
          <div class="px-3 py-2">
            <h4 id="sidebar-no-header-title">All Employees</h4>
          <p>
            {{ gggg }}
          </p>
            <b-nav vertical class="w-25">
              <b-nav-item active>Active</b-nav-item>
              <b-nav-item>Link</b-nav-item>
              <b-nav-item>Another Link</b-nav-item>
              <b-nav-item disabled>Disabled</b-nav-item>
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
            <div class="row justify-content-center">
              <div class="col-7 col-form-label font-weight-bold text-center">Biography:</div>
              <div class="col-7 col-form-label">{{ userinfo.bio | upText }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- list employees card -->
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="py-3 d-flex">
          <span class="h4 justify-content-center">Staff</span>
        </div>
      </div>

      <div class="row my-4 justify-content-center" v-for="user in userss" :key="user.id">
        <div
          v-on:click.prevent="userInfoModal(user.id)"
          class="col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6 py-2 d-flex justify-content-center"
          style="background-color: #ddd;"
        >
          <div class="col-2 d-flex align-items-center justify-content-center">
            <b-avatar
              class="mx-auto d-flex align-items-center justify-content-center"
              size="3rem"
              v-bind:src="'images/profile/' + user.profile_pic"
            ></b-avatar>
          </div>
          <div class="col-10">
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
      userinfo: {},
      userss: {}, //user object
      userkey: 0,
      gggg:null
    };
  },

  created() {
    // axios.get("api/user").then(response => {
    //   console.log(response.data);
    //   this.gggg = response.data;
    // });
    this.loadUsers();
  },

  methods: {
    loadUsers() {
      // await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
      axios
        .get("/guest-get-allemployees/")
        .then(response => (this.userss = response.data)); //get all data from DB

      // let response = await axios.get('http://127.0.0.1:8000/api/user');
      // console.log(response.data);
    },

    trimStr(str, num) {
      if (str.length >= num) {
        var a = str.substring(0, num) + "...";
        return a.replace("\n", " ");
      }
      return str.replace("\n", " ");
    },

    userInfoModal(id) {
      axios.get("/guest-get-employee/" + id).then(response => {
        this.userinfo = response.data;
      });
      $("#emplyeeInfo").modal("show");
    }
  }
};
</script>
