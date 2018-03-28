<template>
    <div class="field is-grouped is-grouped-multiline">
        <div class="control is-expanded">
            <label class="label" for="address" >Address</label>
            <vue-google-autocomplete
                ref="address"
                id="map"
                classname="input form-control"
                placeholder="Start typing the address to find it"
                v-on:placechanged="getAddressData"
                country="uk"
                dusk="thingLocation"
                @keypress.enter.prevent="getAddressData"
            >
            </vue-google-autocomplete>
        </div>
        <div class="control is-expanded">
            <div class="field">
                <label class="label" for="street_number">Street Number</label>
                <div class="control">
                    <input class="input" type="text" v-model="address.street_number" name="street_number"/>
                </div>
            </div>
            <div class="field">
                <label class="label" for="route">Road</label>
                <div class="control">
                    <input class="input" type="text" v-model="address.route" name="route"/>
                </div>
            </div>
            <div class="field">
                <label class="label" for="postal_code">Post Code</label>
                <div class="control">
                    <input class="input" type="text" v-model="address.postal_code" name="postal_code"/>
                </div>
            </div>
        </div>
        <input type="hidden" v-model="addressMeta" name="google_json" />
        <input type="hidden" v-model="address.country" name="country" />
        <input type="hidden" v-model="address.latitude" name="latitude" />
        <input type="hidden" v-model="address.longitude" name="longitude" />
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