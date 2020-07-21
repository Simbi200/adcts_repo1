<template>
  <div>

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

  <div class="container-fluid mt-5">

    <div class="row justify-content-center">

      <!-- People Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomepeople')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="people" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">People</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Employees</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Admins</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Gallery Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="images" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Gallery</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Albums</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Categories</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All Images</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Audio Programs Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="music-note-list" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Audio Programs</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Aired</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Not Aired</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Projects Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="files-alt" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Projects</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Current</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Completed</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Impact Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="hammer" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Our Impact</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Active</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Received</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Reports Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="file-earmark-text" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Reports</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Current</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Completed</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Partners Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="wallet" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Partners</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Local</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">International</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- NoticeBoard Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="newspaper" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">NoticeBoard</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Active</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Outdated</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Messages -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhome-msgs')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="chat-dots" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Comments &amp; Questions</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">This Week</td>
                        <td>{{ values.msg_this_week }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">This Month</td>
                        <td>{{ values.msg_this_month }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All Time</td>
                        <td>{{ values.msg_all_time }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Vacancies Card -->
      <div class="col-12 col-sm-7 col-md-5 col-lg-4 py-3 mx-1">
        <div v-on:click.prevent="goTo('adminhomeallemployees')">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-3 p-2 text-white bg-dark d-flex justify-content-center">
                <b-icon icon="file-text" style="width: 100%; height: auto;"></b-icon>
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h6 class="card-title text-center">Vacancies</h6>
                  <hr />

                  <table class="d-flex justify-content-center">
                    <tbody>
                      <tr>
                        <td class="pr-3">Active</td>
                        <td>{{ values.employees }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">Received</td>
                        <td>{{ values.admins }}</td>
                      </tr>

                      <tr>
                        <td class="pr-3">All</td>
                        <td>{{ values.all_people }}</td>
                      </tr>
                    </tbody>
                  </table>

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
import _ from "lodash";
export default {
  props: [],

  data() {
    return {
      values: {}
    };
  },

  methods: {
    getAllValues() {
      this.$Progress.start();
      axios.get("api/admin-dashboard").then(response => {
        this.values = response.data;
        this.$Progress.finish();
      });
    },

        goTo(a) {
      this.$router.push({name:a});
    },
  },

  created() {},
  mounted() {
    this.getAllValues();
  }
};
</script>
