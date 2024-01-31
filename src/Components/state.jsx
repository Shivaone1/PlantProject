import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const Counter = () => {
  const [count, setCount] = useState(0);

  return (
    <div>
      <p>Count: {count}</p>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  );
};

const App = () => {
  return <Counter />;
};

ReactDOM.render(<App />, document.getElementById('root'));
