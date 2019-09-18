<template>

    <nav class="row mx-auto mt-2">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" aria-label="Previous" @click.prevent="changePage(pagination.current_page-1)"
                   :disabled="pagination.current_page <= 1">&laquo;</a>
            </li>
            <li v-for="page in pages" class="page-item">
                <a id="page" class="page-link" :class="isCurrentPage(page)? 'active' : ''" @click="changePage(page)">{{page}}</a>
            </li>
            <li class="page-item">
                <a class="page-link" aria-label="Next" @click.prevent="changePage(pagination.current_page+1)"
                   :disabled="pagination.current_page >= pagination.last_page">&raquo;</a>
            </li>
        </ul>
    </nav>

</template>

<script>
    export default {
        props: ['pagination', 'offset'],

        methods: {

            isCurrentPage(page) {
                return this.pagination.current_page === page;
            },

            changePage(page) {
                console.log(page);
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }
                this.pagination.current_page = page;
                this.$emit('paginate');

            }
        },
        computed: {
            pages() {
                let pages = [];
                let from = this.pagination.current_page - Math.floor(this.offset / 2);
                if (from < 1) {
                    from = 1;

                }
                let to = from + this.offset - 1;
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                while (from <= to) {
                    pages.push(from);
                    from++;
                }
                return pages;

            }
        },
    }
</script>
