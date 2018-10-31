// @ts-ignore FIXME:
import createRenderPlugins from '@serlo-org/editor-plugins/lib/index.render'
// @ts-ignore FIXME:
import { HtmlRenderer } from '@serlo-org/html-renderer'
import * as React from 'react'
import { hydrate } from 'react-dom'

import { getStateFromElement } from '../helpers'

export const initElement = (element: HTMLElement) => {
  const content = getStateFromElement(element)

  hydrate(
    <HtmlRenderer state={content} plugins={createRenderPlugins()} />,
    element
  )
}