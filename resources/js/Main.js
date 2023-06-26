import React from 'react'
import ReactDOM from 'react-dom/client';

export default function Main() {
  return (
    <div>
      Dashboard Main
    </div>
  )
}

// Create a root.
if (document.getElementById('dashboard')) {
  const dashboard = document.getElementById('dashboard');
  const root = ReactDOM.createRoot(dashboard);
  root.render(<Main/>);
}
