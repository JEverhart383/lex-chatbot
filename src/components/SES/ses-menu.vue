<template>
  <ul class="nav">
    <li class="nav-item">
      <router-link to="/ses">Index</router-link>
    </li>
    <li class="nav-item">
      <router-link to="/ses/emails">Send Email</router-link>
    </li>
    <li class="nav-item">
      <router-link to="/ses/verified-emails">Verified Emails</router-link>
    </li>
    <li class="nav-item">
      <router-link to="/ses/identities">Identities</router-link>
    </li>
  </ul>
</template>
<script>
export default {
  name: 'SesMenu'
}
</script>

