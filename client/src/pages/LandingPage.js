// src/pages/LandingPage.js
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export default function LandingPage() {
  const [variant, setVariant] = useState('Black');
  const [quantity, setQuantity] = useState(1);
  const navigate = useNavigate();

  const product = {
    id: 'prod-001',
    title: 'Chuck Taylor All Star II',
    description: 'A high-top sneaker built for comfort and performance.',
    price: 59.99,
    variants: ['Black', 'White', 'Red'],
    image: '/chuck.jpg',
  };

  const handleBuyNow = () => {
    navigate('/checkout', { state: { product, variant, quantity } });
  };

  return (
    <div>
      <h1>{product.title}</h1>
      <img src={product.image} alt={product.title} width={200} />
      <p>{product.description}</p>
      <p>Price: ${product.price}</p>

      <label>Variant:</label>
      <select value={variant} onChange={(e) => setVariant(e.target.value)}>
        {product.variants.map((v) => (
          <option key={v}>{v}</option>
        ))}
      </select>

      <label>Quantity:</label>
      <input
        type="number"
        min="1"
        value={quantity}
        onChange={(e) => setQuantity(Number(e.target.value))}
      />

      <button onClick={handleBuyNow}>Buy Now</button>
    </div>
  );
}
