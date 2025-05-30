// src/pages/ThankYouPage.js
import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

export default function ThankYouPage() {
  const { orderId } = useParams();
  const [order, setOrder] = useState(null);

  useEffect(() => {
    axios.get(`${process.env.REACT_APP_API}/order/${orderId}`)
      .then(res => setOrder(res.data))
      .catch(err => console.error(err));
  }, [orderId]);

  if (!order) return <p>Loading...</p>;

  return (
    <div>
      <h2>Thank You!</h2>
      <p>Order #: {order.orderId}</p>
      <p>Name: {order.fullName}</p>
      <p>Email: {order.email}</p>
      <p>Product: {order.product.title} ({order.variant})</p>
      <p>Quantity: {order.quantity}</p>
      <p>Total: ${order.total.toFixed(2)}</p>
      <p>Status: {order.status}</p>
    </div>
  );
}
