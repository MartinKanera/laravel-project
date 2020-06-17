<template>
  <div>
    <span>{{ name }}</span>
  </div>
</template>

<script>
export default {
  props: {
    name,
  },
  mounted() {
    console.log(this.props.name);
  }
};
</script>

<style scoped></style>
