<template>
  <div class="container">
    <div id="nav">
      <router-link to="/">
        <img class="Logo" src="../src/assets/Lawyer.png" alt="" />
      </router-link>
    </div>
    <transition name="routerTransition">
      <router-view />
    </transition>
    <div class="copyRights">
      <p>Copyright &copy; 2021 Lawyer Morocco</p>
    </div>
  </div>
</template>


<style>
.routerTransition-enter-from {
  opacity: 0;
  filter: blur(3px);
}
.routerTransition-enter-to {
  opacity: 1;
  filter: blur(0px);
}
.routerTransition-enter-active {
  transition: all 0.5s ease;
}
html {
  scroll-behavior: smooth;
}
.Logo {
  width: 150px;
}
::-webkit-scrollbar {
  width: 0px;
}

.container {
  min-height: 100vh;
  border: #2c3e50 solid 1px;
  background: url("../src/assets/darkBackground.jpg");
  display: flex;
  flex-direction: column;
  /* background-size: cover; */
}

.copyRights {
  color: #aaaa66;
  font-family: poppins;
  font-weight: 300;
  margin-top: auto;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

body {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
