<template>
<div>
    <b-table striped hover :items="quotes" :fields="fields" :per-page="perPage" :current-page="currentPage"></b-table>
    <b-pagination align="center" :total-rows="totalRows" :per-page="perPage" v-model="currentPage"></b-pagination>
</div>
</template>

<script>
function Quote({added_by, author_id, author_name, text}, id) {
    this.id=id;
    this.added_by=added_by;
    this.author_id=author_id;
    this.author_name=author_name;
    this.text=text;
}

export default {
  data() {
    return {
      quotes: [],
      fields: [
        {
          key:'id',
          sortable:true
        },
        {
          key:'author_name',
          sortable: true
        },
        {
          key:'text',
          sortable: false
        }
      ],
      perPage: 25,
      currentPage: 1,
      totalRows: 0,
    };
  },
  methods: {
    read() {
      this.mute = true;
      window.axios.get("/api/quotes").then(({ data }) => {
        data.forEach(quote => {
            this.quotes.push(new Quote(quote, this.quotes.length+1));
        });
        this.mute = false;
        this.totalRows = this.quotes.length;
      });
    }
  },
  created() {
      this.read();
  }
};
</script>

<style>
</style>