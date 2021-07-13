<template>
  <div class="backDrop" @click.self="hideModal">
    <div class="modal">
      <img class="darkLogo" src="../assets/darkLogo.png" alt="" />
      <p class="modalText">
        Your first visit ?, Register now and get your reference key !
      </p>
      <router-link @click="hideModal" class="modalButton" to="/Register"
        >Register</router-link
      >
      <p class="modalText">Already have a reference key&nbsp;? Log in now !</p>
      <router-link @click="hideModal" class="modalButton" to="/Login"
        >login</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  methods: {
    hideModal() {
      this.$emit("hide");
    },
  },
};
</script>

<style scoped>
.modal {
  width: 300px;
  padding: 40px;
  margin: 100px auto;
  background: #aaaa66;
  border-radius: 5px;
  border: solid 2px black;
  padding-bottom: 50px;
}

.backDrop {
  top: 0;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.746);
  width: 100%;
  height: 100vh;
}

.darkLogo {
  width: 65%;
  padding-bottom: 10px;
  border-bottom: solid black 2px;
}

.modalText {
  font-family: poppins;
  font-weight: 300;
  color: #2c3e50;
  font-size: 20px;

  padding: 30px 0 30px 0;
}

.modalButton {
  margin-top: 20px;
  color: #aaaa66;
  cursor: pointer;
  width: 100%;
  background: black;
  border: 0;
  border-radius: 5px;
  font-size: 22px;
  padding: 10px 30px;
  text-decoration: none;
}

.modalButton:focus {
  outline: 0;
}

.modalButton:active {
  transform: scale(0.99);
}
</style>