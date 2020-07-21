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
        <b-sidebar id="sidebar-backdrop" title="People" :backdrop-variant="dark" bg-variant="dark" text-variant="light" backdrop shadow>
          <div class="px-3 py-2">
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
      axios.get("api/employee-dashboard").then(response => {
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
