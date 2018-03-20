<template>
  <div>
    <vue-google-autocomplete
        ref="address"
        id="map"
        classname="input form-control"
        placeholder="Start typing the address to find it"
        v-on:placechanged="getAddressData"
        country="uk"
        dusk="thingLocation"
        @keypress.enter.prevent="getAddressData"
        @submit.prevent
    >
    </vue-google-autocomplete>
    <input type="hidden" v-model="address.country" name="country" />
    <input type="hidden" v-model="address.latitude" name="latitude" />
    <input type="hidden" v-model="address.longitude" name="longitude" />
    <input type="hidden" v-model="address.postal_code" name="postal_code" />
    <input type="hidden" v-model="address.route" name="route" />
    <input type="hidden" v-model="address.street_number" name="street_number" />
    <input type="hidden" v-model="addressMeta" name="google_json" />
  </div>
</template>
<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: { VueGoogleAutocomplete },
        data: function () {
            return {
              address: '',
              addressMeta: '',
            }
        },
        mounted() {
            //this.$refs.address.focus();
            // document.addEventListener("DOMContentLoaded", function(event) {
            // });
        },
        methods: {
            /**
            * When the location found
            * @param {Object} addressData Data of the found location
            * @param {Object} placeResultData PlaceResult object
            * @param {String} id Input container ID
            */
            getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                this.addressMeta = JSON.stringify(placeResultData);
            }
        }
    }
</script>