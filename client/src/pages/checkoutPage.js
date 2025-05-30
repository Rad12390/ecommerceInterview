// src/pages/CheckoutPage.js
import { useLocation, useNavigate } from 'react-router-dom';
import { useState } from 'react';
import axios from 'axios';

export default function CheckoutPage() {
  const { state } = useLocation();
  const navigate = useNavigate();
  const { product, variant, quantity } = state;

  const [form, setForm] = useState({
    fullName: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    state: '',
    zip: '',
    cardNumber: '',
    expiry: '',
    cvv: '',
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async () => {
    try {
      const res = await axios.post(`${process.env.REACT_APP_API}/checkout`, {
        ...form,
        product,
        variant,
        quantity,
      });
      navigate(`/thank-you/${res.data.orderId}`);
    } catch (err) {
      alert('Payment failed or gateway error.');
    }
  };

  return (
    <div>
      <h2>Checkout</h2>
      <input name="fullName" placeholder="Full Name" onChange={handleChange} />
      <input name="email" placeholder="Email" onChange={handleChange} />
      <input name="phone" placeholder="Phone Number" onChange={handleChange} />
      <input name="address" placeholder="Address" onChange={handleChange} />
      <input name="city" placeholder="City" onChange={handleChange} />
      <input name="state" placeholder="State" onChange={handleChange} />
      <input name="zip" placeholder="Zip Code" onChange={handleChange} />
      <input name="cardNumber" placeholder="Card Number" onChange={handleChange} />
      <input name="expiry" placeholder="Expiry Date (MM/YY)" onChange={handleChange} />
      <input name="cvv" placeholder="CVV" onChange={handleChange} />

      <div>
        <h4>Order Summary</h4>
        <p>{product.title} - {variant}</p>
        <p>Quantity: {quantity}</p>
        <p>Total: ${(product.price * quantity).toFixed(2)}</p>
      </div>

      <button onClick={handleSubmit}>Place Order</button>
    </div>
  );
}
