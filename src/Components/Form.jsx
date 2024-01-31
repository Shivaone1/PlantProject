import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const FormExample = () => {
  const [inputValue, setInputValue] = useState('');

  const handleChange = (e) => {
    setInputValue(e.target.value);
  };

  return (
    <div>
      <input type="text" value={inputValue} onChange={handleChange} />
      <p>You typed: {inputValue}</p>
    </div>
  );
};

const App = () => {
  return <FormExample />;
};

ReactDOM.render(<App />, document.getElementById('root'));
