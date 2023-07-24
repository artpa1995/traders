import { useEffect } from 'react';
import io from 'socket.io-client';

const TestWebsocet = () => {
  useEffect(() => {
    const socket = io('http://traders/ws');

    socket.on('connect', () => {
      console.log('Connected to WebSocket');
      // Выполните любые необходимые действия при успешном подключении
    });

    socket.on('your-event', (data) => {
      console.log('Received data from WebSocket:', data);
      // Обработка входящих данных
    });

    return () => {
      socket.disconnect(); // Отключение от WebSocket при размонтировании компонента
    };
  }, []);

  return (
    <></>
    // Ваш JSX код
  );
};

export default TestWebsocet;
