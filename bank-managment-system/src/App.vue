<template>
<router-view></router-view>
</template>

<script>
export default {
  name: "App",
  data() {
    return {};
  },
};
</script>

<style>
html,
body,
#app {
  width: 100%;
  height: 100%;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: start;
  background-color: #e8eef2;
  font-family: monospace;
  user-select: none;
}
</style>
