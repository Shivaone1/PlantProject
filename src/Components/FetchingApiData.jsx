import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

const ApiExample = () => {
  const [data, setData] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
      const result = await response.json();
      setData(result);
    };

    fetchData();
  }, []);

  return <p>{data ? `Title: ${data.title}` : 'Loading...'}</p>;
};

const App = () => {S
  return <ApiExample />;
};

ReactDOM.render(<App />, document.getElementById('root'));
