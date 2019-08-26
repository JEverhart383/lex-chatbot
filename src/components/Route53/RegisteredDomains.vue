<template>
<div id="route53-registered-domains">
  <h2 class="mt-5">Registered Domains</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Private Zone</th>
        <th>Origin</th>
        <th>DNS Records Count</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="domain in registeredDomains" :key="domain.Id">
        <td>{{ domain.Id }}</td>
        <td>{{ domain.Name }}</td>
        <td>{{ domain.Config.PrivateZone }}</td>
        <td>{{ domain.Config.Comment || 'Alternate DNS Provider' }}</td>
        <td>{{ domain.ResourceRecordSetCount }}</td>
      </tr>
    </tbody>
  </table>
</div>
</template>