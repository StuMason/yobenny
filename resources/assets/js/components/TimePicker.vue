<template>
  <datepicker placeholder="Select Date" 
              :config="{enableTime: true, noCalendar: true, dateFormat: 'H:i', time_24hr: true, static: true}">
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