<form action="{{ route('donation.success') }}" method="GET">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_test_VxWhacSnOSH2wD"
        data-amount="{{ $orderId }}"
        data-currency="INR"
        data-name="My Store"
        data-description="Test Transaction"
        data-image="https://your-awesome-site.com/logo.png"
        data-prefill.name="{{ $name }}"
        data-prefill.email="{{ $email }}"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="{{ $orderId }}" name="razorpay_order_id">
    <input type="hidden" value="INR" name="razorpay_currency">
    <input type="hidden" value="{{ $amountPaise }}" name="razorpay_amount">
    <input type="hidden" value="My Store" name="razorpay_merchant_name">
    <input type="hidden" value="Payment for Order ID: {{ $orderId }}" name="razorpay_description">
    <input type="hidden" value="{{ env('APP_URL') }}/payment/failure" name="razorpay_cancel_url">
    <button type="submit" class="btn btn-primary">Pay Now</button>
</form>