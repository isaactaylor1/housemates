<template>
    <div class="container">
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="block block-link-pop text-center">
                    <div class="block-content block-content-full justify-content-center align-items-center">
                        <div class="col-12 pb-3">
                            <i class="fas fa-university fa-4x"></i>
                        </div>
                        <div class="col-12">
                            <div class="font-size-h2 font-w300 text-muted">Balance</div>
                            <div class="font-size-h2 font-w600 mt-2 text-uppercase" v-if="account[0]">£{{ balance }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default text-center">
                            <h3 class="block-title"><b>Account Transaction</b></h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center py-2">
                                <div class="col-12 col-md-auto col-lg-3 my-auto">
                                    <div class="form-group">
                                        <label for="block-form-username">Type</label>
                                        <select class="form-control selectpicker" v-model="transaction.type">
                                            <option selected disabled>Select Types</option>
                                            <option value="1">Deposit</option>
                                            <option value="2">Withdraw</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-auto col-lg-3 my-auto">
                                    <div class="form-group">
                                        <label for="block-form-username">Amount</label>
                                        <input type="number" min="0.00" step="any" name="ammount" class="form-control" placeholder="0.00" v-model="transaction.value">
                                    </div>
                                </div>
                                <div class="col-12 col-md-auto col-lg-3 my-auto">
                                    <div class="form-group">
                                        <label for="block-form-username">Short Description</label>
                                        <input type="text" name="description" class="form-control" v-model="transaction.description">
                                    </div>
                                </div>
                                <div class="col-12 col-md-auto col-lg-3 my-auto">
                                    <div class="form-group">
                                        <label for="block-form-username"></label>
                                        <button class="btn btn-sm btn-success" type="button" style="width:100%;" @click="confirmTransaction"><i class="fas fa-check"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col">
                <div class="js-wizard-simple block block-rounded js-appear-enabled animated fadeIn">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Transaction History</h3>
                    </div>
                    <div class="block-content block-content-full tab-content">
                        <transactions></transactions>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <pagination></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Transactions from './Transactions';
import Pagination from './layout/tables/Pagination.vue';
export default {
    data: function () {
        return {
            routePrefix: "/accounts/transactions/",
            account: {},
            datatable: {
                data: {},
                current_page: 1,
                per_page: 10,
                last_page: 0,
                total: 1,
            },
            transaction: {},
        }
    },
    components: {
        Transactions,
        Pagination,
    },
    computed: {
        balance: function () {
            return this.$root.format_number(this.account[0].current_balance)
        }
    },
    mounted() {
        this.readAccount();
        if (this.$route.query.page) {
            this.datatable.current_page = this.$route.query.page;
        }
        this.readTransactions(this.datatable.current_page)
    },
    methods: {
        confirmTransaction() {
            axios
            .post(this.routePrefix + "deposit/" + this.$route.params.id, this.transaction)
            .then((response) => {
                this.$root.notification(response.data.message, "success");
            })
            .catch((error) => {
                this.$root.notification(error.response.data.message, "error");
            })
            .then((response) => {
                this.readAccount();
                this.readTransactions(this.datatable.current_page);
            })
        },
        readAccount() {
            axios.get("/accounts/" + this.$route.params.id)
            .then(response => {
                this.account = response.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        readTransactions(page) {
            var route = this.routePrefix + "read/" + this.$route.params.id + "/?";
            route += "page=" + page;
            this.$router
            .push({
                query: {
                    page: page,
                },
            })
            axios.get(route)
            .then(response => {
                this.datatable = response.data;
            })
            .catch(error => {
                console.log(error);
            })
            .then(response => {

            })
        },
        changePage(current_page) {
            if (current_page <= this.datatable.last_page && current_page > 0) {
                this.datatable.current_page = current_page;
                this.readTransactions(current_page);
            }
        },
    }
}
</script>