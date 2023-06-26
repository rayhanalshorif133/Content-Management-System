import React from 'react'
import ReactDOM from 'react-dom';

export default function Main() {
  return (
    <div>
      Dashboard Main
    </div>
  )
}

if (document.getElementById('dashboard')) {
    ReactDOM.render(<Main />, document.getElementById('dashboard'));
}
