<script>
import axios from "axios";

export default {
    methods: {
        addToCard(product_id) {
            axios.post(route('cart.addToCart'), {
                product_id: product_id,
            }).then(response => {
                return response.data.cart
            })
        }
    }
}
</script>
