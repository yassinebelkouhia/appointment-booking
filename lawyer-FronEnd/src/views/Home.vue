<template>
  <div class="home">
    <p class="slogan">
      Where you find the best <span class="goldenText">law professionals</span>
    </p>
    <p class="homeText">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis et
      error ea. Recusandae voluptates esse exercitationem tempora dolores sit
      earum hic, voluptatem quos voluptas id nobis dolorum, dignissimos
      assumenda harum temporibus? Cupiditate nisi quis repellendus, deleniti
      error maiores quaerat nihil atque obcaecati sequi ex minus vitae rem
      accusamus expedita molestiae. Quibusdam, exercitationem? Doloremque nemo,
      laborum excepturi iusto adipisci dolor, ab repudiandae praesentium
      repellat dolorum voluptate expedita optio error laboriosam cumque illum
      necessitatibus id magni. Architecto nam, veritatis dolore quo voluptatibus
      saepe sint atque quos odit, placeat quaerat enim cum corporis eum dolorum.
      Possimus laborum eligendi quia, cum esse quidem sed, repellendus ea magni,
      delectus earum dolore. Hic ea saepe ab, suscipit repellat illo obcaecati
      maiores neque velit quos necessitatibus perspiciatis alias cumque
      cupiditate ratione asperiores corporis pariatur laboriosam deleniti natus
      dolore unde aspernatur! In consequatur dolor ipsa inventore hic a
      molestias expedita! Dolorem nam quis iure error magnam odio corporis vero
      odit animi minus, dolore quae explicabo non consequuntur similique? Eaque,
      nesciunt architecto adipisci molestias voluptas amet maiores provident
      atque assumenda exercitationem voluptatem aperiam natus, necessitatibus
      ratione sint labore doloribus nisi, voluptate odit dolore inventore illo.
      Neque, perferendis iusto architecto enim consequatur quisquam corrupti
      iste quidem, voluptas deleniti natus expedita!
    </p>

    <button @click="toggleModal" class="bookingButton">
      Book Now<sup>+</sup>
    </button>

    <transition name="modalTransition">
      <div v-if="isModalShown">
        <Modal @hide="toggleModal" />
      </div>
    </transition>
  </div>
</template>

<script>
import Modal from "../components/Modal.vue";
export default {
  name: "Home",
  data() {
    return {
      isModalShown: false,
    };
  },
  components: {
    Modal,
  },
  methods: {
    toggleModal() {
      this.isModalShown = !this.isModalShown;
    },
  },
};
</script>

<style>
.modalTransition-enter-from {
  opacity: 0;
}

.modalTransition-enter-active,
.modalTransition-leave-active {
  transition: opacity 0.6s ease;
}

.modalTransition-leave-to {
  opacity: 0;
}

.homeText {
  font-family: poppins;
  color: whitesmoke;
  font-size: 20px;
  font-weight: 100;
  width: 90%;
  margin: auto;
  padding: auto;
}

.slogan {
  font-family: poppins;
  color: whitesmoke;
  font-size: 40px;
  font-weight: 100;
  padding-top: 50px;
}

.goldenText {
  color: #aaaa66;
}

.bookingButton {
  padding: 10px 20px;
  margin-top: 70px;
  color: #aaaa66;
  border: solid 1px #aaaa66;
  background: none;
  font-size: 30px;
  font-family: poppins;
  font-weight: 300;
  border-radius: 5px;
}
</style>
