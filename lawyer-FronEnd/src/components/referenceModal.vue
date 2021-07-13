<template>
  <div class="referenceBackDrop" @click.self="hideReferenceModal">
    <div class="referenceModal">
      <img src="../assets/darkLogo.png" alt="" class="darkLogo" />
      <h1 class="referenceUser">
        Welcome Mr/Ms {{ userFullName ? userFullName : "" }} !
      </h1>
      <p class="modalText">Your reference key is :</p>
      <br />
      <p class="referenceKey">
        {{ referenceKey ? referenceKey : "" }}
      </p>
      <div class="buttonContainer">
        <router-link class="referenceModalButton" to="../views/Booking"
          >Make a Booking</router-link
        >
        <router-link class="referenceModalHomeButton" to="/"
          >Back to home page</router-link
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      referenceKey: "",
      userFullName: "Yassine Ait Belkouhia",
    };
  },
  props: {
    ref: String,
  },
  name: "referenceModal",
  methods: {
    hideReferenceModal() {
      this.$emit("hideReferenceModal");
    },
  },
  created() {
    this.referenceKey = localStorage.getItem("ref")
      ? localStorage.getItem("ref")
      : "";
    this.userFullName = localStorage.getItem("UserFullName")
      ? localStorage.getItem("UserFullName")
      : "";
  },
};
</script>

<style scoped>
.modalText {
  font-family: poppins;
}
.referenceModal {
  background-color: black;
  min-width: 200px;
  margin: 20px auto;
  position: fixed;
  top: 0;
  border-radius: 5px;
  background-color: #aaaa66;
  padding: 20px 40px;
}

.modalText {
  font-family: poppins;
  font-weight: 300;
  font-size: 20px;
}

.referenceKey {
  font-family: poppins;
  letter-spacing: 1px;
  font-weight: 300;
  font-size: 35px;
  border-bottom: #2c3e50 solid 1px;
  width: 35%;
  margin: auto;
}

.referenceUser {
  font-family: poppins;
  font-weight: 300;
}

.referenceBackDrop {
  top: 0;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  background: black;
  width: 100%;
  height: 100vh;
}

.referenceModal h1 {
  font-size: 24px;
}

.referenceModalButton {
  color: #aaaa66;
  cursor: pointer;
  background: black;
  border-radius: 5px;
  padding: 15px 30px;
  text-decoration: none;
  font-size: 20px;
}

.buttonContainer {
  display: flex;
  gap: 30px;
  margin: 30px auto 0 auto;
  padding: 40px;
  padding-bottom: 20px;
}

.referenceModalHomeButton {
  color: #2c3e50;
  cursor: pointer;
  background: transparent;
  border: #2c3e50 solid 1px;
  border-radius: 5px;
  padding: 15px 30px;
  text-decoration: none;
  font-size: 20px;
}

.darkLogo {
  width: 12vw;
}
</style>