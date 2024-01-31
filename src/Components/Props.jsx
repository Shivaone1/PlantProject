import React from 'react';
import ReactDOM from 'react-dom';

const Greet = (props) => {
  return <div>Hello, {props.name}!</div>;
};

const App = () => {
  return <Greet name="John" />;
};

ReactDOM.render(<App />, document.getElementById('root'));
