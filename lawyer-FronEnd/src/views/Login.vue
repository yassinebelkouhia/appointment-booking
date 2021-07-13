<template>
  <div class="logIn">
    <div class="formContainer">
      <h1>Enter your reference key</h1>
      <form action="" @submit.prevent="login">
        <div class="formControl">
          <input
            @focus="toggleclass"
            type="text"
            v-model="referenceKey"
            required
          />
          <label :class="labelClass">Your REFERENCE KEY:</label>
        </div>

        <button class="loginButton">Login</button>
        <p>
          You don't have a refernece key yet ? <br />
          <router-link class="isntRegistred" to="/Register"
            >Get Yours Now !</router-link
          >
        </p>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      labelClass: "",
      referenceKey: "",
    };
  },

  methods: {
    toggleclass() {
      this.labelClass = "movingLabel";
    },
    async login() {
      let resp = await fetch("http://localhost/Back-End/Login/checkRef", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          ref: this.referenceKey,
        }),
      });
      let data = await resp.json();

      if (data == "logged") {
        this.$router.push("/BookingsTable");
      }
    },
  },
};
</script>

<style scoped>
.formContainer {
  background-color: #aaaa66;
  padding: 20px 40px;
  border-radius: 5px;
  width: 300px;
  margin: 109px auto;
  font-family: poppins;
}

.formContainer h1 {
  font-weight: 300;
  text-align: center;
  font-size: 20px;
  margin-bottom: 100px;
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
  padding: 15px 0;
  font-size: 18px;
  color: #2c3e50;
  font-family: poppins;
}

.formControl label {
  position: absolute;
  top: 17px;
  left: 0;
}

.movingLabel {
  transform: translateY(-30px);
  transition: all 0.3s ease;
}

.formControl input:focus,
.formControl input:valid {
  outline: 0;
}

.loginButton {
  margin-top: 50px;
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

.isntRegistred {
  text-decoration: none;
  color: black;
}

.registerButton:focus {
  outline: 0;
}

.registerButton:active {
  transform: scale(0.99);
}

.loginButton:focus {
  outline: 0;
}

.loginButton:active {
  transform: scale(0.99);
}
</style>
