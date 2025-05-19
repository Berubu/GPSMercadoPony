module.exports = {
  testEnvironment: "jsdom",
  transform: {
    "^.+\\.(js|jsx)$": "babel-jest",
  },
  moduleNameMapper: {
    '\\.(css|less|scss|sass)$': 'identity-obj-proxy', // Ignorar archivos CSS
  },
  transformIgnorePatterns: [
    "/node_modules/(?!bootstrap)/", // Incluir Bootstrap en las excepciones
  ],
};
