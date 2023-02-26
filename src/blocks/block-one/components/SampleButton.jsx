import React, { memo } from "react";
import { Button } from "@wordpress/components";
import styled from "styled-components";

export const SampleButton = memo(() => {
  return (
  <SButton>ボタンです</SButton>
  );
});

const SButton = styled(Button)`
  background-color: black;
  width: 100px;
  height: 100px;
  color: red;
`
