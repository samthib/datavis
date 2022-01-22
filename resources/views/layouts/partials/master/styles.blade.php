<style media="screen">
/* redifine boostrap variable */
.bg-dark {
  background-color: {{ ($design->color ?? '') }}!important;
}
.text-dark {
  color: {{ ($design->color ?? '') }}!important;
}
.hero-img {
  background-image: url("{{ asset('storage/'.($design->hero ?? '')) }}");
}
</style>
