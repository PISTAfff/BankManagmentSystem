<template>
  <div class="TransactionCompMainContainer">
    <h1 class="TransactionTitle" :class="Color">
      {{ Title }}
    </h1>
    <h1 class="TransactionName">
      {{
        (Title == "Finished Request" || Title == "Request" || "Canceled Request"
          ? "From: "
          : Title == "Send" ||
            Title == "OutGoing Request" ||
            Title == "Completed Request"
          ? "To: "
          : "") + Name
      }}
      <ButtonComp
        v-if="Title === 'Request' && !this.sent"
        text="Send"
        size="Medium"
        clr="green"
        @click="send()"
      />
      <ButtonComp
        v-if="Title === 'Request' && !this.sent"
        text="Decline"
        size="Medium"
        clr="red"
        @click="decline()"
      />
    </h1>
    <h1 class="TransactionAmount" :class="Color">
      {{ Amount + " egp" }}
    </h1>
    <h1 class="TransactionDate">{{ Date }}</h1>
  </div>
</template>

<script>
import ButtonComp from "./ButtonComp.vue";
export default {
  name: "TransactionComp",
  props: {
    Title: {
      type: String,
      required: true,
    },
    Name: {
      type: String,
      required: true,
    },
    Amount: {
      type: Number,
      required: true,
    },
    Date: {
      type: String,
      required: true,
    },
    Color: {
      type: String,
      required: true,
    },
    ID: {
      type: Number,
      required: true,
    },
    SendState: {
      type: Boolean,
      required: true,
    },
  },
  components: {
    ButtonComp,
  },
  data() {
    return { sent: this.SendState };
  },
  methods: {
    send() {
      this.$emit("send", [this.Name, this.Amount, this.ID]);
      this.sent = true;
    },
    decline() {
      this.$emit("decline", [this.Name, this.Amount, this.ID]);
      this.sent = false;
    },
  },
};
</script>

<style>
.TransactionCompMainContainer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 85%;
  padding: 0 7.5%;
  height: 75px;
  min-height: 75px;
  background-color: #f3f3f3;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em,
    rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em,
    rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
  font-size: 11px;
}
.TransactionTitle,
.TransactionName {
  width: 400px;
}
.TransactionName {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 50px;
}
.TransactionAmount,
.TransactionDate {
  width: 110px;
}
.TransactionTitle::before {
  content: "Transaction : ";
  color: black;
}
.TransactionDate {
  font-size: 15px;
}
.TransactionAmount {
  white-space: nowrap;
}
.Green {
  color: #447604;
}
.Red {
  color: #d05353;
}
</style>
