<template>
  <div class="bookingsTable">
    <div class="tableHeader">
      <h1 class="tableHeaderText">
        Welcome MR/MS {{ userFullName ? userFullName : "" }}
      </h1>
      <p class="tableHeaderPar">Check your reservations below :</p>
    </div>

    <table class="Bookings">
      <tr>
        <th style="width: 100px">Date</th>
        <th>Time</th>
        <th>Subject</th>
        <th style="width: 120px">Action</th>
      </tr>
      <tr v-for="d in data" :key="d.id">
        <td>{{ d.Date }}</td>
        <td>{{ d.time }}</td>
        <td>
          {{ d.bookingSubject }}
        </td>
        <td>
          <div class="actionBox">
            <button class="btn" @click="readSingle(d.id)">
              <img class="actionIcons" src="../assets/update.png" alt="" />
            </button>
            <button class="btn" @click="Delete(d.id)">
              <img class="actionIcons" src="../assets/remove.png" alt="" />
            </button>
          </div>
        </td>
      </tr>
    </table>
    <button class="addBooking" @click="createBooking">
      Add Booking <sup>+</sup>
    </button>
    <transition name="updateForm">
      <div v-if="showUpdate" class="Booking">
        <div class="formContainer">
          <p>Please fill in the following form:</p>
          <form action="" @submit.prevent="Update(id)">
            <div class="formControl">
              <input v-model="bookingSubject" type="text" required />
              <label>Booking Subject:</label>
            </div>
            <div class="formControl">
              <input
                type="date"
                :min="todayDate"
                v-model="updatingDate"
                required
              />
              <label>Date:</label>
            </div>

            <div class="formControl">
              <select v-model="Time">
                <option v-for="tm in time" :key="tm">
                  {{ tm }}
                </option>
              </select>
              <label>Time Slot:</label>
            </div>

            <button class="bookingButton">Book Now</button>
          </form>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "BookingsTable",
  data() {
    return {
      data: [],
      showUpdate: false,
      time: ["10:00", "11:00", "14:00", "15:00", "16:00"],
      bookingSubject: "",
      updatingDate: "",
      Time: "",
      id: -1,
    };
  },
  methods: {
    createBooking() {
      this.$router.push("/Booking");
    },
    async redaAll() {
      let resp = await fetch("http://localhost/Back-End/rendezVous/readAll", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          Ref: localStorage.getItem("ref"),
        }),
      });

      this.data = await resp.json();
    },
    async Delete(id) {
      await fetch("http://localhost/Back-End/rendezVous/delete", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });

      this.redaAll();
    },

    async readSingle(id) {
      this.showUpdate = true;
      setTimeout(() => {
        window.scrollTo(0, document.body.scrollHeight);
      }, 200);

      let resp = await fetch(
        "http://localhost/Back-End/rendezVous/read_single",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id,
          }),
        }
      );

      let data = await resp.json();

      this.bookingSubject = data.bookingSubject;
      this.updatingDate = data.Date;
      this.Time = data.time;
      this.id = data.id;

      this.redaAll();
    },
    async Update(id) {
      await fetch("http://localhost/Back-End/rendezVous/update", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
          Date: this.updatingDate,
          time: this.Time,
          bookingSubject: this.bookingSubject,
        }),
      });
      this.showUpdate = false;
      this.redaAll();
    },
  },

  created() {
    this.redaAll();
    this.userFullName = localStorage.getItem("UserFullName")
      ? localStorage.getItem("UserFullName")
      : "";
  },
};
</script>

<style scoped>
.updateForm-enter-from {
  opacity: 0;
  transform: translateY(-20%);
}
.updateForm-enter-to {
  opacity: 1;
}
.updateForm-enter-active {
  transition: all 0.5s ease;
}

.btn {
  background: transparent;
  outline: none;
  border: none;
}

.addBooking {
  margin: 30px auto;
  color: #2c3e50;
  cursor: pointer;
  display: inline-block;
  width: 200px;
  background: #aaaa66;
  padding: 15px;
  border: 0;
  border-radius: 5px;
  font-size: 18px;
}

.bookingsTable {
  min-height: 73vh;
}

.tableHeader {
  margin-bottom: 100px;
}

.Bookings {
  width: 80%;
  padding: 40px;
  border-radius: 5px;
  margin: auto;
  color: #2c3e50;
  background-color: #aaaa66;
  font-family: poppins;
  font-weight: 300;
}

.Bookings th {
  font-weight: 400;
}

tr {
  border-bottom: 1px solid #2c3e50;
}

.tableHeaderText {
  color: #aaaa66;
  font-family: poppins;
  font-weight: 300;
}

.actionIcons {
  width: 25px;
  display: inline;
}

.tableHeaderPar {
  color: #aaaa66;
  font-family: poppins;
  font-weight: 300;
  font-size: 20px;
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
  top: -13px;
  left: 0;
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