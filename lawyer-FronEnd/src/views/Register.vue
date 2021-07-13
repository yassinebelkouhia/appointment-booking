<template>
  <div class="register">
    <div class="formContainer">
      <h1>Get your reference key</h1>
      <form @submit.prevent="Insert">
        <div class="formControl">
          <input
            @focus="toggleNameclass"
            type="text"
            required
            v-model="fullName"
          />
          <label :class="fullNameLabelClass">Full Name:</label>
        </div>

        <div class="formControl">
          <input
            @focus="togglEmailclass"
            type="email"
            required
            v-model="email"
          />
          <label :class="emailLabelClass">Email:</label>
        </div>

        <div class="formControl">
          <input
            @focus="togglePhoneclass"
            type="number"
            required
            v-model="phoneNumber"
          />
          <label :class="phoneLabelClass">Phone Number :</label>
        </div>

        <button class="registerButton">Submit</button>
        <p>
          Already have a reference key ?<router-link class="logedIn" to="/login"
            >Log in.</router-link
          >
        </p>
      </form>
    </div>
    <transition name="referenceModalTransition">
      <div v-if="isReferenceModalShown">
        <referenceModal @hideReferenceModal="toggleReferenceModal" />
      </div>
    </transition>
  </div>
</template>

<script>
import referenceModal from "../components/referenceModal.vue";
export default {
  name: "Register",
  components: {
    referenceModal,
  },
  data() {
    return {
      isReferenceModalShown: false,

      fullName: "",
      email: "",
      phoneNumber: "",

      fullNameLabelClass: "",
      emailLabelClass: "",
      phoneLabelClass: "",
      // bol: 0,
    };
  },

  methods: {
    toggleNameclass() {
      this.fullNameLabelClass = "movingLabel";
    },
    togglEmailclass() {
      this.emailLabelClass = "movingLabel";
    },
    togglePhoneclass() {
      this.phoneLabelClass = "movingLabel";
    },
    toggleReferenceModal() {
      this.isReferenceModalShown = !this.isReferenceModalShown;
    },

    async Insert() {
      let resp = await fetch("http://localhost/Back-End/Register/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          fullName: this.fullName,
          Email: this.email,
          tel: this.phoneNumber,
        }),
      });

      let data = await resp.json();

      localStorage.setItem("ref", data.ref);
      localStorage.setItem("UserFullName", data.name);
      // this.bol = 1;
      this.isReferenceModalShown = true;
    },
  },
};
</script>



<style scoped>
.referenceModalTransition-enter-from {
  opacity: 0;
}

.referenceModalTransition-enter-active,
.referenceModalTransition-leave-active {
  transition: opacity 0.5s ease;
}

.referenceModalTransition-leave-to {
  opacity: 0;
}

input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.formContainer {
  background-color: #aaaa66;
  padding: 20px 40px;
  border-radius: 5px;
  width: 300px;
  margin: 50px auto;
  font-family: poppins;
}

.formContainer h1 {
  font-weight: 300;
  text-align: center;
  margin-bottom: 60px;
  font-size: 24px;
}

.logedIn {
  text-decoration: none;
  color: black;
}

.formControl {
  position: relative;
  margin: 20px 0 40px;
  text-align: left;
}

.formControl input {
  background-color: transparent;
  border: 0;
  border-bottom: 2px black solid;
  display: block;
  width: 100%;
  padding: 13px 0;
  font-size: 18px;
  color: #2c3e50;
  font-family: poppins;
}

.movingLabel {
  transform: translateY(-30px);
  transition: all 0.3s ease;
}

.formControl label {
  position: absolute;
  top: 17px;
  left: 0;
}

.formControl input:focus,
.formControl input:valid {
  outline: 0;
}

.registerButton {
  margin-top: 20px;
  color: #aaaa66;
  cursor: pointer;
  display: inline-block;
  width: 100%;
  background: black;
  padding: 15px;
  border: 0;
  border-radius: 5px;
  font-size: 18px;
}

.registerButton:focus {
  outline: 0;
}

.registerButton:active {
  transform: scale(0.99);
}
</style>
