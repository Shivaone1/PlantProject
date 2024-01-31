import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const Greeting = ({ isLoggedIn }) => {
  return isLoggedIn ? <p>Welcome back!</p> : <p>Please log in</p>;
};

const App = () => {
  const [isLoggedIn, setLoggedIn] = useState(false);

  return (
    <div>
      <Greeting isLoggedIn={isLoggedIn} />
      <button onClick={() => setLoggedIn(!isLoggedIn)}>
        {isLoggedIn ? 'Logout' : 'Login'}
      </button>
    </div>
  );
};

ReactDOM.render(<App />, document.getElementById('root'));
