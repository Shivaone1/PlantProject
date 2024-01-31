import React from 'react';
import ReactDOM from 'react-dom';

const ListExample = () => {
  const fruits = ['Apple', 'Banana', 'Orange'];

  return (
    <ul>
      {fruits.map((fruit, index) => (
        <li key={index}>{fruit}</li>
      ))}
    </ul>
  );
};

const App = () => {
  return <ListExample />;
};

ReactDOM.render(<App />, document.getElementById('root'));
