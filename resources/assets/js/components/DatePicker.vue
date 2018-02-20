<template>
  <datepicker placeholder="Select Date" 
              :config="{minDate: 'today', dateFormat: 'd-m-Y',  static: true }">
  </datepicker>
</template>

<script>
import Datepicker from 'vue-bulma-datepicker'

export default {
  components: {
    Datepicker
  }
}
</script>