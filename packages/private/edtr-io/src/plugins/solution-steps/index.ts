import {
  child,
  object,
  list,
  string,
  boolean,
  EditorPluginProps,
  optional
} from '@edtr-io/plugin'

import { SolutionStepsEditor } from './editor'
import { SemanticSolutionTypes } from '../semantic-plugin-helpers'

export type SolutionStepsProps = EditorPluginProps<typeof solutionStepsState>

const stepState = object({
  type: string(SemanticSolutionTypes.step),
  isHalf: boolean(),
  content: child({ plugin: 'rows' })
})

export const solutionStepsState = object({
  introduction: child({ plugin: 'text' }),
  strategy: optional(child({ plugin: 'rows' })),
  solutionSteps: list(stepState),
  additionals: optional(child({ plugin: 'rows' }))
})

export const solutionStepsPlugin = {
  Component: SolutionStepsEditor,
  state: solutionStepsState,
  config: {}
}
