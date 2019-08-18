import React from 'react';
import PropTypes from 'prop-types';

const Intro = ({ body }) => <div className="stack" dangerouslySetInnerHTML={{ __html: body }} />;

Intro.propTypes = {
  headline: PropTypes.string,
  body: PropTypes.string,
};

export default Intro;
