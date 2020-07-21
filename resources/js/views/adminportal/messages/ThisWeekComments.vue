<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header h3 py-3 text-center">This Week's Comments</div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                  <table class=" ">
                    <thead>
                      <tr>
                        <th class="px-4">
                          <strong>Sender</strong>
                        </th>
                        <th class="px-5">
                          <strong>Subject</strong>
                        </th>
                        <th class="pl-5">
                          <strong>Date and Time</strong>
                        </th>
                        <th class="pl-5">
                          <strong>Action</strong>
                        </th>
                      </tr>
                    </thead>
                    <br />
                    <tbody>
                      <tr v-for="comment in comments.data" :key="comment.id">
                        <td class="px-4">{{ comment.sender }}</td>
                        <td class="px-5">{{ comment.subject }}</td>

                        <td
                          class="pl-5"
                          v-if="comment.sender && comment.subject"
                        >{{ comment.created_at | momentDateTime}}</td>

                        <td class="pl-5 h4">
                          <a href="#">
                            <i class="las la-book-open pr-2" style="color: white;"></i>
                          </a>
                          <a href="#" @click.prevent="deleteMsg(comment.id)">
                            <i class="las la-trash pr-2" style="color: #d66;"></i>
                          </a>
                        </td>
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
</template>

<script>
export default {
  props: [],
  data() {
    return {
      form: new Form({}),
      comments: {}
    };
  },

  methods: {
    deleteMsg(id) {
      Swal.fire({
        title: "Delete Message?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/admin-delete-comment/" + id)
            .then(() => {
              toast.fire({ icon: "success", title: "Employee deleted" });
              CustomEvent.$emit("deleted");
            })
            .catch(() => {
              toast.fire({ icon: "warning", title: "Error deleting employee" });
            });
        }
      });
    },
    getAllMsg(page) {
      if (typeof page === "undefined") {
        page = 1;
      }
      console.log("page is " + page);
      axios.get("api/admin-get-comments1?page=" + page).then(response => {
        this.comments = response.data;
      });
    }
  },

  created() {
    CustomEvent.$on("deleted", () => {
      this.getAllMsg();
    });
  },

  mounted() {
    this.getAllMsg();
  },

  components: {}
};
</script>

