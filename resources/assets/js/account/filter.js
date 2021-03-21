import Vue from "vue";

Vue.filter("transactionType", function(value) {
    if (value == 1) 
        return "Deposit";
    else 
        return "Withdrawal";
  });