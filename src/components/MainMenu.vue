<template>
  <div class="main-menu-wrapper">
    <div class="row mt-5">
    <div class="col-md-6">
      <!-- <div id="aws-workbench-app"></div> -->
      <div class="alert alert-success">
        Your connection to AWS is initialized. You are currently logged in as dude
      </div>
      <div class="alert alert-danger">
        You are NOT CONNECTED to AWS
      </div>
    </div>
    <div class="col-md-6">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="credentials-tab" data-toggle="tab" href="#credentials" role="tab" aria-controls="credentials" aria-selected="false">Credentials</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p></p>
          <p></p>
          <p></p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Here is some content</div>
        <div class="tab-pane fade" id="credentials" role="tabpanel" aria-labelledby="contact-tab">
          <form action="" method="post">
            <table class="form-table">
              <t-body>
                <tr>
                  <th>
                    <label for="API_KEY">API Key</label>
                  </th>
                  <td>
                    <input type="password" class="regular-text" name="API_KEY" id="API_KEY" value="<?php echo $credentials['API_KEY']?>">
                  </td>
                </tr>
                <tr>
                  <th>
                  <label for="API_SECRET">API Secret</label>
                  </th>
                  <td>
                    <input type="password" class="regular-text" name="API_SECRET" id="API_SECRET" value="<?php echo $credentials['API_SECRET'] ?>">
                  </td>
                </tr>
              </t-body>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h2>Services</h2>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5>Route 53 | Registrar and DNS</h5>
              <router-link to="/route53" class="list-group-item list-group-item-action">Use Route 53</router-link>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5>S3 | Simple Storage Service</h5>
              <div class="list-group">
                <router-link to="/s3" class="list-group-item list-group-item-action">Use S3</router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5>Lex | NLP and Chatbot</h5>
              <router-link to="/lex" class="list-group-item list-group-item-action">Use Lex</router-link>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5>SES | Simple Email Service</h5>
              <router-link to="/ses" class="list-group-item list-group-item-action">Use SES</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
export default Vue.extend({
  name: 'MainMenu'
})
</script>

<style>

</style>
