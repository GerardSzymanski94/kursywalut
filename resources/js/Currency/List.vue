<template>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Kursy wymiany walut</span>

        <span style="color: green" v-show="msg_success">Kursy walut zostały zaktualizowane</span>

        <span style="color: red" v-show="msg_error">Coś poszło nie tak</span>

        <button type="button" @click="updateCurrencies()" class="btn-sm btn-primary">Aktualizuj kursy wymiany
            walut
        </button>
    </nav>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Kod</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Kurs</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="currency in currencies.data">
            <th scope="row">{{ currency.code }}</th>
            <td>{{ currency.name }}</td>
            <td>{{ currency.exchange_rate }}</td>
        </tr>

        </tbody>
    </table>

</template>

<script>

export default {
    data() {
        return {
            currencies: [],
            msg_success: false,
            msg_error: false,
        }

    },
    created() {
        const p = new Promise((resolve, reject) => {

        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        axios.get("/api/currency/all").then(response => (this.currencies = response.data));
        console.log(this.currencies);
    },
    methods: {
        updateCurrencies() {
            console.log('start');
            axios.get("/api/currency/update").then().catch(error => {
                this.msg_error = true
            }).finally(() => this.msg_success = true);
        }
    }
};
</script>
