<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div
          class="card px-3  ">
          <div class="card-header text-center display-3">{{ users.first_name | upText}} {{ users.last_name | upText}}
          </div>
          <div class="card-body  ">
            <div class="row mt-5">
              <div class="col-lg-8">
                <div class="row mb-2">
                  <h2 class=" ">General Info</h2>
                  <div class="col-lg-12">
                    <h5 class=" ">
                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">First name:</div>
                        <div class="col-lg-7">{{ users.first_name | upText}}</div>
                      </div>
                      <p />

                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">Last name:</div>
                        <div class="col-lg-7">{{ users.last_name | upText}}</div>
                      </div>
                      <p />

                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">Date of birth:</div>
                        <div class="col-lg-7">{{ users.dob | momentTime}}</div>
                      </div>
                      <p />

                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">Joined on:</div>
                        <div class="col-lg-7">{{ users.joined_on | momentTime}}</div>
                      </div>
                      <p />

                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">Position:</div>
                        <div class="col-lg-7">{{ users.position | upText}}</div>
                      </div>
                      <p />

                      <div class="row">
                        <div class="col-lg-4 font-weight-bold pl-2">Email:</div>
                        <div class="col-lg-7">{{ users.email }}</div>
                      </div>
                      <p />
                    </h5>
                  </div>
                </div>
                <hr />

              </div>
              <div class="col-lg-4">
                <img
                  v-if="users.img_set"
                  src="images/default.jpg"
                  class="rounded img-responsive"
                  alt="employee image"
                />
                <div v-else>
                  <img
                    v-if="users.sex"
                    src="images/mdefault.jpg"
                    class="rounded img-responsive"
                    alt="male default image"
                  />
                  <img
                    v-if="!users.sex"
                    src="images/fdefault.jpg"
                    class="rounded img-responsive"
                    alt="female default image"
                  />
                </div>
              </div>
            </div>
            <div class="row">
                  <div class="col-lg-12  ">
                    <h2 class=" ">My brief bio</h2>
                    <br />
                    <h5 class=" ">{{ users.bio }}</h5>
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
  name: "UserProfile",
  data() {
    return {
      users: {}, //user object
      key: 0
    };
  },

  methods: {},

  created() {
    if (sessionStorage.getItem("sentdata")) {
      this.key = JSON.parse(sessionStorage.getItem("sentdata"));
    }
    axios.get("api/guest-get-employee/" + this.key).then(response => {
      this.users = response.data;
    });
  }
};
</script>
