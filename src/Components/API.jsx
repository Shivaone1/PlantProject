import React, { createContext, useContext } from 'react';
import ReactDOM from 'react-dom';

const ThemeContext = createContext('light');

const ThemedComponent = () => {
  const theme = useContext(ThemeContext);
  return <p>Current Theme: {theme}</p>;
};

const App = () => {
  return (
    <ThemeContext.Provider value="dark">
      <ThemedComponent />
    </ThemeContext.Provider>
  );
};

ReactDOM.render(<App />, document.getElementById('root'));
