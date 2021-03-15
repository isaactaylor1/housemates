<template>
    <div class="container">
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="block block-link-pop text-center">
                    <div class="block-content block-content-full justify-content-center align-items-center">
                        <div class="col-12 pb-3">
                            <i class="fas fa-university fa-5x"></i>
                        </div>
                        <div class="col-12">
                            <div class="font-size-h2 font-w300 text-muted">Balance</div>
                            <div class="font-size-h2 font-w600 mt-2 text-uppercase">£ {{balance}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default text-center">
                            <h3 class="block-title"><b>Deposit</b></h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center py-2">
                                <div class="col-sm-10 col-md-8">
                                    <div class="form-group">
                                        <label for="block-form-username">Amount</label>
                                        <input type="text" name="deposit" class="form-control" id="block-form-username" v-model="deposit">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success" type="button" style="width:100%;" @click="depositMoney">Deposit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="be_blocks_forms.html" method="POST">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default text-center">
                            <h3 class="block-title"><b>Withdraw</b></h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center py-2">
                                <div class="col-sm-10 col-md-8">
                                    <div class="form-group">
                                        <label for="block-form-username">Amount</label>
                                        <input type="text" name="withdraw" class="form-control" id="block-form-username" v-model="withdraw">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-danger" type="button" style="width:100%;" @click="withdrawMoney">Withdraw</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            routePrefix: "/account/",
            balance: '100.00',
            deposit: '',
            withdraw: '',
        }
    },
    methods: {
        depositMoney() {
            axios
            .post(this.routePrefix + "deposit", deposit)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
        },
        withdrawMoney() {
            axios
            .post(this.routePrefix + "withdraw", withdraw)
            .then((response) => {
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>