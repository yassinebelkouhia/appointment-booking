<template>
  <div class="Booking">
    <div class="formContainer">
      <h1>Welcome MR/MS {{ userFullName ? userFullName : "" }}</h1>
      <p>Please fill in the following form:</p>
      <form action="" @submit.prevent="insert">
        <div class="formControl">
          <input @focus="toggleclass" v-model="subject" type="text" required />
          <label :class="labelClass">Booking Subject:</label>
        </div>
        <div class="formControl">
          <input
            @focus="toggleDateAndTimeClass"
            type="date"
            :min="todayDate"
            :max="limiteDate"
            v-model="date"
            required
          />
          <label class="dateAndTime" :class="dateAnedTimelabelClass"
            >Date:</label
          >
        </div>

        <div class="formControl">
          <select @focus="toggleDateAndTimeClass" v-model="TimeSlots">
            <option v-for="tm in time" :key="tm">
              {{ tm }}
            </option>
          </select>
          <label class="dateAndTime" :class="dateAnedTimelabelClass"
            >Time Slot:</label
          >
        </div>

        <button class="bookingButton">Book Now</button>
      </form>
    </div>
  </div>
  <transition name="bookingTransition">
    <div v-if="isBookingConfirmed">
      <dropDown />
    </div>
  </transition>
</template>

<script>
import dropDown from "../components/dropDown.vue";
export default {
  name: "Booking",
  data() {
    return {
      labelClass: "",
      dateAnedTimelabelClass: "",
      isBookingConfirmed: false,
      todayDate: "",
      time: ["10:00", "11:00", "14:00", "15:00", "16:00"],
      TimeSlots: "",
      subject: "",
      date: "",
      userFullName: "",
    };
  },
  components: {
    dropDown,
  },

  mounted() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0");
    var yyyy = today.getFullYear();
    today = yyyy + "-" + mm + "-" + dd;
    this.todayDate = today;
  },

  methods: {
    toggleclass() {
      this.labelClass = "movingLabel";
      console.log(getTodayDate());
    },

    toggleDateAndTimeClass() {
      this.dateAnedTimelabelClass = "dateAndTimemovingLabel";
    },
    async insert() {
      await fetch("http://localhost/Back-End/rendezVous/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          Date: this.date,
          time: this.TimeSlots,
          reference_id: localStorage.getItem("ref"),
          bookingSubject: this.subject,
        }),
      });

      this.isBookingConfirmed = true;
    },
  },
  created() {
    this.userFullName = localStorage.getItem("UserFullName")
      ? localStorage.getItem("UserFullName")
      : "";
  },
};
</script>

<style scoped>
.bookingTransition-enter-from {
  opacity: 0;
}
.bookingTransition-enter-to {
  opacity: 1;
  top: 0;
}
.bookingTransition-enter-active {
  transition: all 0.3s ease;
}
.bookingTransition-leave-from {
  opacity: 1;
}
.bookingTransition-leave-to {
  opacity: 0;
}
.bookingTransition-leave-active {
  transition: all 0.3s ease;
}

select {
  height: 60px;
  width: 100%;
  text-align: center;
  border-radius: 3px;
  border: 0;
  color: #2c3e50;
  border-bottom: black solid 2px;
  background-color: #aaaa66;
  font-family: poppins;
  font-size: 18px;
  appearance: none;
  padding-left: 10px;
}

option:hover {
  background-color: red;
}
select:focus {
  outline: none;
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
  font-size: 22px;
  margin-bottom: 20px;
}
.formContainer p {
  font-weight: 300;
  text-align: center;
  font-size: 18px;
  margin-bottom: 50px;
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

.dateAndTime {
  opacity: 0;
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

.dateAndTimemovingLabel {
  transform: translateY(-30px);
  transition: all 0.4s ease;
  opacity: 1;
}

.formControl input:focus,
.formControl input:valid {
  outline: 0;
}

.bookingButton {
  margin: 30px auto;
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

.bookingButton:focus {
  outline: 0;
}

.bookingButton:active {
  transform: scale(0.99);
}
</style>
